# MA21-Safe Haven

Features of Safe Haven: 

 • Analysis of number of cases pre suburb.
  The website displays a map of Victoria. This map is divided county wise. On the map one
  can see total number of cases they have been suffering for the past five years.

• Analysis of the number for accused.
  The website will give a basic idea about the different number of accused people in a
  family. This number would reveal a total number of accused partners, former partners,
  family members and others.
  
• Understanding situation.
   This feature will propose the users with a questionaire. Options to the question’s answers will
be given and the users will have the liberty to check any number of options. Once the user selects all the questions, he/she likes they would given a final answer about
their situation based on probability of the options.

• List of services that might help them out.
  Here the users will be given a list of services that can help them out. All the services are carefully selected to ensure that the victims get the best possible
answer and help for their problems.

• Developing a self-care plan.
  Here the users will be given an option to develop a self-care plan. The users will be able to develop a short or long-time plan based on their choice. This plan
would be aimed to help the user recover themselves. Users can create new activities and use drag and drop mechanism to design a plan.

![111](https://user-images.githubusercontent.com/63653648/151895778-dad0f18d-0014-4461-abe2-f08b11b589cb.png)

 
  # System Architecture
The system is deployed in an AWS EC2 instance, the image used for it is ‘Bitnami WordPress’. The
website was developed using the Bitnami WordPress stack that follows a “LAMP” structure,
meaning that it uses a Linux operating system, Apache HTTP server, MySQL database and PHP
programming language. In the front end, the web application uses HTML, CSS, and JS
technologies. For the code that we made to create the self-care routine, we hosted it
separately in an S3 storage, and therefore is called from the website. As data visualization we
used Tableau.
![112](https://user-images.githubusercontent.com/63653648/151895785-a2b0cad2-2335-4e3a-8a13-8d6d33890d2c.png)


 
