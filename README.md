KaraokeServer
=============
remember to create directories: songs, temps and upload

mysql -u admin -p -h mydbinstance.cuokcm6jg2jf.ap-southeast-1.rds.amazonaws.com loveallu_karaoke < /home/ubuntu/karaoke2.sql

Server MUST install sox and mp3 handler:

sudo apt-get install sox
sudo apt-get install libsox-fmt-mp3
// or use lame:
sudo apt-get install lame

LAME can be installed on CentOS painlessly using yum. You'll first need the RPMForge repository:

rpm -Uhv http://apt.sw.be/redhat/el5/en/i386/rpmforge/RPMS/rpmforge-release-0.3.6-1.el5.rf.i386.rpm
Then:

yum install lame

Convert wav to mp3:
lame -b 32 --resample 8 -a <wavefilename> <mp3filename>
sox -t wav -r 8000 -c 1 upload/1391468572635270652204729479.wav -t mp3 /tmp/new_file.mp3

install SOX:
sudo apt-get install libasound2-plugins libasound2-python libsox-fmt-all
sudo apt-get install sox

ON MAC OS:
http://ggkarman.de/tech/building-sox-with-mp3-support-works-on-mavericks/



INSTALL LAME ON OSX:
Getting the Source
$ cd ~/source
$ curl -L -O http://downloads.sourceforge.net/project/lame/lame/3.99/lame-3.99.5.tar.gz
$ tar -zxvf lame-3.99.5.tar.gz
$ rm -r lame-3.99.5.tar.gz
$ cd lame-3.99.5

Installing
$ ./configure
$ make
$ sudo make install

Checking if it was installed successfully
$ which lame
$ lame -v



GET SAMPLE SATE OF A FILE:
sox --i  1391446892224670_SOUNDDOGS__do.mp3 | grep "Sample Rate" | grep -o "[0-9]*"

GET NUMBER OF CHANNELS:
sox --i  1391446892224670_SOUNDDOGS__do.mp3 | grep "Channels" | grep -o "[0-9]*"