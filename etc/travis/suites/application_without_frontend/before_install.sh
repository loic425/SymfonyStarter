#!/usr/bin/env bash

source "$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)/../../../bash/common.lib.sh"

run_command "bin/remove-frontend"
run_command "etc/travis/suites/application/before_install.sh"
