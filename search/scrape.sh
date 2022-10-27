#!/bin/bash

# This is a script that's typically ran via cront to start a scraping operation
# so the search index is updated.
# Cron example:
# 2 3 * * * /var/www/meilisearch/scrape.sh >> /dev/null 2>&1

docker run -t --rm \
  --network=host \
  -e MEILISEARCH_HOST_URL='http://localhost:7700' \
  -e MEILISEARCH_API_KEY='def456' \
  -v /var/www/meilisearch/config.json:/docs-scraper/config.json \
  getmeili/docs-scraper:latest pipenv run ./docs_scraper config.json