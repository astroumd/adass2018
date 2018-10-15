#
# using a git repo with multiple users can be challenging.
# use group permissions
# chmod -R g+rws .git/objects
#
help:
	@echo no help

publish:  gaia

teuben:
	ssh gaia.astro.umd.edu '(cd ~teuben/public_html/adass/2018; git pull)'
	@echo See: http://www.astro.umd.edu/~teuben/adass/2018

gaia:
	ssh gaia.astro.umd.edu '(cd /home/www/adass2018; umask 2; git pull)'
	@echo See: http://adass2018.umd.edu
