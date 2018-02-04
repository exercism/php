# This watcher script works for exercism PHP tests.
# Run using `bash watcher.sh`

if [ -z "$1" ]; then
  FILE=$(ls *_test.php | sed -e "s/_test.php//g")
else
  FILE=$1
fi

LAST_UPDATE=$(ls -la ./${FILE}.php)
LAST_UPDATE_TEST=$(ls -la ./${FILE}_test.php)

while [ true ]
do
  if [ "$LAST_UPDATE" != "$(ls -la ./${FILE}.php)" ] || 
     [ "$LAST_UPDATE_TEST" != "$(ls -la ./${FILE}_test.php)" ];
   then
    phpunit ./${FILE}_test.php
    LAST_UPDATE=$(ls -la ./${FILE}.php)
    LAST_UPDATE_TEST=$(ls -la ./${FILE}_test.php)
  fi
    sleep 1
done
