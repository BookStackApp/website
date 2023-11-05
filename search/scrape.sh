#!/bin/bash

# This is a script that's typically ran via cront to start a scraping operation
# so the search index is updated.
# Cron example:
# 2 3 * * * /var/www/meilisearch/scrape.sh >> /dev/null 2>&1

# Local
CONFIG_DIR="$PWD/config.json"

# Production
#CONFIG_DIR="/var/www/meilisearch/config.json"

docker run -t --rm \
  --network=host \
  -e MEILISEARCH_HOST_URL='http://localhost:7700' \
  -e MEILISEARCH_API_KEY='mLg0ioHwp2BnG5Rbxkj3ZFL6t1Y9DDmHUkUBpZ0zqmA' \
  -v $CONFIG_DIR:/docs-scraper/config.json \
  getmeili/docs-scraper:v0.12.12 pipenv run ./docs_scraper config.json