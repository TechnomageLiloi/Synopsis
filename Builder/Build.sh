#!/usr/bin/env bash

echo "=-=-=-=-=-=-=-=-=-=-=";
echo "= Building Synopsis =";
echo "=-=-=-=-=-=-=-=-=-=-=";

bash Less.sh
php ./Archiver.php
echo "Done building.";