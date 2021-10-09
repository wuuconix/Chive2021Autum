file=$1 #输入要进行压缩的文件
random=$RANDOM
zip $random $file -P $random
last_file="$random.zip"
for i in {1..1000}
do
	random=$RANDOM
	zip $random $last_file -P $random
	rm $last_file
	last_file="$random.zip"
done
echo "zip done"
