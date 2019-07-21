# OctoberCMS Event Counter Plugin

<img src="icon.png" height="100">

This plugin allows you to monitor your desired events and see a chart for each of them, showing how they have happened over time.

# Introduction
Many plugins, as well as OctoberCMS itself, fire events to notify users about what's happening around them. For example, the RainLab User plugin fires `rainlab.user.login` event to indicate that some user has successfully signed in. You can take advantage of these events to monitor your website. 

# Adding Events To Monitor
To monitor an event, simply add its fully qualified name to the list of events provided by this plugin. For example, you can add `rainlab.user.login` to monitor how many users log in to your system over time.

# Monitoring Events
After you add your desired events, they will be automatically logged as they happen. On the `Statistics` page under the `Event Counter` menu, you can see the time-series chart of any of your events by selecting the event name from a dropdown menu.

# Known Bugs
- The data point is not shown on the chart if the data is available only for one day.

# Planned Features
1. Add dashboard widgets
2. Add an alert for counters that go above or below a threshold
3. Add counter for page visits
4. Log event parameters
5. Add support for Prometheus monitoring system

# Contribution
Please feel free to 
- Send Suggestions
- Report Bugs
- Send Pull Requests
