#!/usr/bin/env bash
set -euo pipefail

dir=$(dirname "$0")
cd "$dir"
composer install --no-interaction --prefer-dist
