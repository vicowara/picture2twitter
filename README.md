picture2twitter
===============

upload picture to pic.twitter.com from yorufukurou  
*!!DO NOT USE ON PUBLIC SERVER!!*


library requirements
---------------
tmhOAuth [https://github.com/themattharris/tmhOAuth]

how to use
---------------
Move twitpic_uploader.php and tmhOAuth.php to "/Library/WebServer/Documents" and mkdir "hoge" with appropriate permission.  
You can start Apache server with below command `sudo apachectl start`.  
After that,need to configure Yorufukurou. Run Yorufukurou and go configuration->service->image service, choose custom and set "http://localhost/twitpic_uploader.php" to path.  
