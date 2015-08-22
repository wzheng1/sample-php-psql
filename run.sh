#!/bin/sh

# Helper script to run the sample app locally, assumes a local mysql instance with a
# login of root/root
if [ -z "${POSTGRESQL_DATABASE}" ]; then
  export DATABASE_SERVICE_HOST=localhost
  export DATABASE_SERVICE_PORT=5433
  export POSTGRESQL_DATABASE=test
  export POSTGRESQL_ROOT_PASSWORD=root
fi

exec php index.php
