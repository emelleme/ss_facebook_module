<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >

  <head>
		<% base_tag %>
		$MetaTags(false)

<% require themedCSS(typography) %>

		
</head>
  <body>
  <h3><img src="/emergencyalert/images/alert.png" style="margin: 0 6px -6px 0;">
  <% control ActiveAlert %>Emergency Alert: $Headline<% end_control %>
  </h3>
			
	<div id="formsreports">
	
		<div id="fr_left">
			<h3><a href="#"><img src="/themes/ppdv1/img/icon_form-large.png" style="margin: 0 6px -3px 0;">Share this Alert</a></h3>
			<!-- Fight Crime & Commend Officer -->
			<div class="header_blue"></div>
			<div class="middle_blue">
			
			
			
			<h2><img src="/themes/ppdv1/img/titleicon_fightcrime.png" style="margin: 0 6px -6px 0;">Fight Crime</h2>
			<p>Submit a tip and help the Philadelphia Police Department make your neighborhood safer for everyone.</p>
			
			
			<h3><a href="/forms/submit-a-tip"><img src="/themes/ppdv1/img/icon_form-large.png" style="margin: 0 6px -3px 0;">Submit a Tip Form</a></h3>
			<p></p>
			
			
			
			<h2><img src="/themes/ppdv1/img/titleicon_commend.png" style="margin: 0 6px -6px 0;">Commend an Officer</h2>
			<p>If you would like to recognize an officer who has performed his/her duties in a manner that you think is exceptional and reflects favorably upon the officer and the Department, then we encourage you to take a moment and tell us about it.</p>
			<h3><a href="/forms/commend-an-officer/"><img src="/themes/ppdv1/img/icon_form-large.png" style="margin: 0 6px -3px 0;">Commend an Officer Form</a></h3>
			
			</div>
			<div class="footer_blue"></div>
			<!-- /Fight Crime & Commend Officer -->
			
			<!-- Reports & Services -->
			<div class="header"></div>
			<div class="middle">
				<div style="display:none">
					
			
					<ul>
					<li><a href="http://pdreports.phila.gov/arpublic/ARPubHome.asp" target="_blank"><img src="/themes/ppdv1/img/icon_form-small.png" style="margin: 0 6px -3px 0;">Accident or Police Incident Reports</a>
					<li><a href="http://www.phillypolice.com/assets/docs/PPD-Form.Records-Check.pdf" target="_blank"><img src="/themes/ppdv1/img/icon_pdf.png" style="margin: 0 6px -3px 0;">Records Check</a>
					<li><a href="http://www.phillypolice.com/assets/docs/PPD-Form.Alarm-Registration.pdf" target="_blank"><img src="/themes/ppdv1/img/icon_pdf.png" style="margin: 0 6px -3px 0;">Register Your Alarm System</a>
					<li><a href="http://www.phillypolice.com/assets/docs/PPD-Form.Firearm-License-Application.pdf" target="_blank"><img src="/themes/ppdv1/img/icon_pdf.png" style="margin: 0 6px -3px 0;">License to Carry</a>
					<li><a href="http://www.phillypolice.com/assets/PPDELSApplicationForm.pdf" target="_blank"><img src="/themes/ppdv1/img/icon_pdf.png" style="margin: 0 6px -3px 0;">Register with 911 - ELS Application</a>
					<li><a href="http://www.phillypolice.com/assets/PPDFormADAApplication.pdf" target="_blank"><img src="/themes/ppdv1/img/icon_pdf.png" style="margin: 0 6px -3px 0;">Register with 911 - ADA Application</a>
					</ul>
			
					<h3><a href="http://www.phila.gov/311" target="_blank"><img src="/themes/ppdv1/img/icon_311.png" style="margin: 0 6px -3px 0;">311 for Non-Emergencies</a></h3>
				</div>
			</div>
			<div class="footer"></div>
			<!-- /Reports & Services -->
		
		</div>
		<!-- /FR Left -->
		
		
		<div id="fr_right">
			
			<!-- File a Complaint -->
			<div class="header"></div>
			<div class="middle">
			
			
			</div>
			
			<div class="homepage_button" style="margin: 9px 0 12px 0;">
		<a href="https://safecam.phillypolice.com" style="border: none;"><img src="themes/ppdv1/img/callout/home_safecam.png" alt="SafeCam - Private Cameras for Public Safety" /></a>
	</div>
	
	
	<div class="homepage_button" style="margin: 8px 0 0 0;">
		<a href="/about/philly-police-blog/" style="border: none;"><img src="themes/ppdv1/img/callout/home_mini_ramseysblog.png" alt="Philly Police Blog" /></a>
	</div>
	
	
			<div class="footer"></div>
			<!-- /File a Complaint -->
	<h2><img src="/themes/ppdv1/img/titleicon_filecomplaint.png" style="margin: 0 6px -6px 0;">Headlines</h2>
	<div class="middle">
		<% if Headlines %>
		<% control Headlines %>
		<p><a href="news/$URLSegment">$Title.LimitCharacters(54)</a></p>
		<% end_control %>
		<% end_if %>
	 	<a href="/news" class="view_all">View More News...</a>
	</div>
	
	<div class="footer"></div>		
			
			<!-- Report Corruption in the Ranks>
			<div class="header"></div>
			<div class="middle">
			<h2><img src="/themes/ppdv1/img/titleicon_reportcorruption.png" style="margin: 0 3px 0 0;">Report Corruption in the Ranks</h2>
			<p><strong>Integrity Starts with You.</strong> It's up to all of us to bring back a sense of professionalism and pride to the Philadelphia Police Department. This form can be submitted anonymously unless you choose to leave contact information.</p>
			
			<h3><a href="/forms/police-personnel-misconduct/"><img src="/themes/ppdv1/img/icon_form-large.png" style="margin: 0 6px -3px 0;">Police Personnel Misconduct Form</a></h3>
			
			</div>
			<div class="footer"></div>
			< /Report Corruption in the Ranks -->
			
		</div>
		<!-- /FR Right -->
		
	</div>
	<!-- /Formsreports -->
	
	<div class="clear"></div>
</body>
</html>
