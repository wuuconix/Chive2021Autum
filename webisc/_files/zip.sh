file="backup.tar.gz"
random=$RANDOM
zip $random $file -P $random
last_file="$random.zip"
for i in {1..3600}
do
	random=$RANDOM
	zip $random $last_file -P $random
	rm $last_file
	last_file="$random.zip"
done
echo "zip done"
