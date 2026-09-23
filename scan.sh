#!/usr/bin/env bash
# Roda localmente as mesmas verificações do pipeline (só precisa de Docker).
# Uso: ./scan.sh
# Saída 0 = nada encontrado; 1 = alguma verificação achou problema.

cd "$(dirname "$0")"
DOCKER="docker run --rm -u $(id -u):$(id -g) -e HOME=/tmp -v $(pwd):/src -w /src"
falhas=()

echo "==> [1/3] Testando as regras Semgrep próprias (semgrep-rules/)"
$DOCKER semgrep/semgrep semgrep --test semgrep-rules/ || falhas+=("testes das regras")

echo
echo "==> [2/3] SAST: Semgrep (regras prontas + próprias)"
$DOCKER semgrep/semgrep semgrep scan \
    --config p/php --config p/secrets --config r/php.laravel \
    --config semgrep-rules/ --metrics=off --error || falhas+=("SAST (Semgrep)")

echo
echo "==> [3/3] SCA: composer audit (dependências com CVE)"
# --locked lê o composer.lock, e não o vendor/ (que pode estar desatualizado)
$DOCKER -e COMPOSER_HOME=/tmp/composer composer:latest composer audit --locked || falhas+=("SCA (composer audit)")

echo
if [ ${#falhas[@]} -eq 0 ]; then
    echo "✅ Nenhum problema encontrado."
    exit 0
fi
echo "❌ Problemas encontrados em: ${falhas[*]}"
exit 1
