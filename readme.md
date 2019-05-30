# PSI - Redirect Blog Posts By Category

**Creation Date:** 2019.05.29  
**Updated:** 2019.05.30  
**Version:** 1.0.1  
  
	
## Description
Custom blog redirect using WordPress. We need to redirect blogs that are
in specific categories but can't use a simple redirect due to URL/permalink
structure.  

The code we're using makes use of `add_action()` and the hook `template_redirect`
to fire the redirection before WordPress decides which template page to load.


## Use
Copy and paste the code in `code-for-functions.php` at the bottom of the
current themes `functions.php` file. Do NOT copy the opening and closing
PHP tags.



## Changelog
**v1.0.1** - (Date: 2019.05.30)  
Moved to wp_safe_redirect and added `blog.psionline.com` to allowed
host list.


**v1.0.0** (Date: 2019.05.29)  
Initial code for testing platform (local).