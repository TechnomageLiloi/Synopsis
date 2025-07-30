#!/usr/bin/env bash

echo "Compiling LESS...";

printf "\tSources/Style"; lessc ../Sources/Style.less ../Sources/Style.css; printf "\n";
printf "\tDone compiling LESS to CSS\n";
