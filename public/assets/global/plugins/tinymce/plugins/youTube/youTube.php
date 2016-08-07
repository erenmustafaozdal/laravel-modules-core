<?php
/**
 *
 *
 * @author Josh Lobe
 * http://ultimatetinymcepro.com
 */
?>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/jquery-ui-git.js"></script>
<script type="text/javascript" src="includes/youTube.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="includes/youTube.css" />

<div id="body">

    Search: <input type="text" id="queryinput" size="60" class="form-control" /> <input id="search_youtube" type="submit" value="Search" class="btn-default" />
    <br /><br />
    
    <div id="youtube_container">
    
        <div id="search-results-block">
            Search results will display here...
        </div>
        <div id="sidebar_right">
        
        	<div id="video_preview">
        		<img id="youtube_iframe" src="images/preview.png" title="Preview" />
            </div>
            
            <div id="size_controls">
            	<br /><br />
                <table cellpadding="5">
                <tbody>
                    <tr>
                        <td class="form_label">
                        Width:
                        </td><td> 
                        <input type="text" id="youtube_width" size="2" class="form-control" value="330" /> px
                        </td>
                        <td class="form_label extra_opts">
                        autoplay: <input type="checkbox" id="youtube_autoplay" /><label id="youtube_autoplay_label" for="youtube_autoplay">Off</label>
                        </td>
                    </tr>
                    <tr>
                        <td class="form_label">
                        Height:
                        </td><td>
                        <input type="text" id="youtube_height" size="2" class="form-control" value="230" /> px
                        </td>
                        <td class="form_label extra_opts">
                        rel: <input type="checkbox" id="youtube_rel" /><label id="youtube_rel_label" for="youtube_rel">Off</label>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <div style="clear:both;"></div>
    
    <div>
        <div style="float:left;">
            <table cellpadding="10">
            <tbody>
                <tr>
                    <td class="form_label">
                    YouTube URL:
                    </td><td> 
                    <input type="text" id="youtube_url" size="80" class="form-control" placeholder="YouTube Url..." />
                    </td>
                </tr>
                <tr>
                    <td class="form_label">
                    Title:
                    </td><td>
                    <input type="text" id="youtube_title" size="80" class="form-control" placeholder="Title..." />
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
        <div style="float:left;">
        </div>
    </div>
    <div style="clear:both;"></div>
</div>
<br />
<button id="youtube_cancel" class="btn-default">Cancel</button> <button id="youtube_insert" class="btn-primary">Insert and Close</button>