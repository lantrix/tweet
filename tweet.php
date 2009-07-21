<?php

/*
Plugin Name: Tweet
Version: 1.2
Plugin URI: http://techdebug.com/wordpress-plugins/tweet/
Description: Automatically links Twitter.com @usernames and #hashtags in Wordpress blog posts.
Author: Lantrix
Author URI: http://techdebug.com 
*/

// $Revision: 1.2 $
// $Date: 2009/05/24 13:52:38 $

/*
Copyright (c) 2009, TechDebug.com

Permission to use, copy, modify, and/or distribute this software for any
purpose with or without fee is hereby granted, provided that the above
copyright notice and this permission notice appear in all copies.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR
ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN
ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF
OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
*/

// Display Twitter @username links
function tweet($text) {
       $text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"tweet-username\">@$2</a>$3 ", $text);
       $text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://search.twitter.com/search?q=%23$2\" class=\"tweet-hashtag\">#$2</a>$3 ", $text);
       return $text;
}    

// Replace content and excerpt
add_filter('the_content', 'tweet', 9);
add_filter('the_excerpt', 'tweet', 9);
// Un-Comment to allow @username and #hashtag links for comments.
//add_filter('get_comment_text', 'tweet', 9);
//
?>
