#!/bin/bash

set -e

exec /usr/bin/supervisord -n -c /etc/supervisor/supervisord.conf
