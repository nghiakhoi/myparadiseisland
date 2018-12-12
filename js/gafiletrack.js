/*	Javascript to tag file downloads and external links in Google Analytics
	All outbound links and links to non-html files should now be automatically tracked.
	
	Colm McBarron (colm.mcbarron@iqcontent.com)
	Feb 12 2006
	
	Niamh Phelan (niamh.phelan@iqcontent.com)
	Updated By, Jul 22 2008	
	
	Peter McKenna (peter.mckenna@iqcontent.com)
	Updated By, Nov 07, 2008 */

var hrefs = document.getElementsByTagName("a");
var link_path = "";
for (var l = 0; l < hrefs.length; l++) {
		try {
			// Add the hostname and link location into variables
			var link_path = hrefs[l].pathname;
			var link_location = String(hrefs[l]);
			
			// Check to see if the link is an internal link
			if (location.host == hrefs[l].hostname) 
			{
				if(link_path.match(/\.(doc|pdf|xls|ppt|zip|txt|vsd|vxd|js|rar|exe|wma|mov|avi|wmv|mp3)$/)) 
				{
					addtrackerlistener(hrefs[l]);
				}
			} 
			else 
			{
				// Check if it's a mail link
				if (link_location.match(/^mailto:/i)) 
				{
					addmailtotrackerlistener(hrefs[l]);
				}
				else
				{
					addtrackerlistener(hrefs[l]);
				}
			}
		}
		catch(err) { }
}

// Add a listener to matching file links
function addtrackerlistener(obj) {
	if (obj.addEventListener) {
		obj.addEventListener('click', trackfiles, true);
	} else if (obj.attachEvent) {
		obj.attachEvent("on" + 'click', trackfiles);
	}
}

// Add a special listener to mailto: links
function addmailtotrackerlistener(obj) {
	if (obj.addEventListener) {
		obj.addEventListener('click', trackmailto, true);
	} else if (obj.attachEvent) {
		obj.attachEvent("on" + 'click', trackmailto);
	}
}

// Track file links
function trackfiles(array_element) {
	var file_path = "";
	// Track an external link
	if (location.host != this.hostname) {
		file_path = "/exlinks/" + ((array_element.srcElement) ? array_element.srcElement.hostname : this.hostname);
		file_path = file_path + ((array_element.srcElement) ? "/" + array_element.srcElement.pathname : this.pathname);
	}
	// Track an internal link
	else {
		file_path = ((array_element.srcElement) ? "/" + array_element.srcElement.pathname : this.pathname);	
		var file_details = file_path.split('/');
		file_path = window.location + '/' + file_details[(file_details.length-1)];
	}
	pageTracker._trackPageview(file_path);
}

// Generate page view for a mailto: link
function trackmailto(array_element) {
	var email = ((array_element.srcElement) ? array_element.srcElement.href : this.href).substring(7);
	var url = window.location;
	var mail_path = '/exlinks/'+url+'/'+email;
	pageTracker._trackPageview(mail_path);
}