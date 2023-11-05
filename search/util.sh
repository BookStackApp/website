#!/bin/bash

# This is a collection of common utilities to help manage the Meilisearch instance

#### Export the key to use as an environment variable
export MEILISEARCH_API_KEY='mLg0ioHwp2BnG5Rbxkj3ZFL6t1Y9DDmHUkUBpZ0zqmA'

### Create a key
curl \
  -X POST 'http://localhost:7700/keys' \
  -H 'Content-Type: application/json' \
  -H "Authorization: Bearer $MEILISEARCH_API_KEY" \
  --data-binary '{
    "description": "Search docs key",
    "actions": ["search"],
    "indexes": ["docs"],
    "expiresAt": "2033-01-01T00:00:00Z"
  }'