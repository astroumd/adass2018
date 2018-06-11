#
# using a git repo with multiple users can be challenging.
# use group permissions
# chmod -R g+rws .git/objects
#
help:
	@echo no help

gaia:
	ssh gaia.astro.umd.edu '(cd /home/www/adass2018; umask 2; git pull)'
