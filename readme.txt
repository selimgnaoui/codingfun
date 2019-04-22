
How to install ?
 As I am a big fan of docker and virtualization, I m using Docker in this project and kept my host clean. neither php nor composer are installed in my host.
 Requirement :
  Docker v 18 ,
  docker-compose as the orchestration tool .
  git instlalled in order to pull this project.


 How to install ( if you are pulling it form git)
  1) clone the project  and run docker-compose up -d
  2) run  ./install.sh  (the will build all docker container, build compsoer dependencies etc ... )
  3) set the mongodb username and password in the docker-compose file (line 24 and 25 )
  4) navigate to localhost:80 ( if you are under an Unix System, otherwise get your docker-machien ip if you are using windows)


 Technologies and Frameworks used :
   - MongoDB as a Database
   - Laravel for the Frontend Part
   - Symfony for interacting with the database

  Note : I m using a free version Mongodb server host (mlab.com). Therefore I kept my username and password secret.

 * As I m interested on microservices and SOA architectures based softwares  , I created two seperate services :
   - Backend using Symfony 4.2 ( this will ONLY interact with the database and return data) as a REST API
   - Frontend using Laravel 5.3 to consume the rest Service
   - the two services will comminucate using the HTTP Protocol.
   - Services are totaly independant  from each other ( to achieve more scalability etc... )
   - I Used DI,IOC,Service providing in the both services to make the app easy to test and the code more elegant, ( We can easily create stub nad mocks thank DI)

   - unfortunately, I wasnt able to write a lot of unit Tests as the configuration took me a lot of time (dealing with php dependency.. ).. but I already mentionned, I tried to apply all Design patterns and Softwate tech methods (SOLID) in order to make my code easy to test . Services can be easily mocked, COntrollers will only do ONE thing , configuration are not hard coded , but injected externally
   - the only unit test I wrote using codeception can be found under client/tests/unit
   - I took some ready dockerFiles and adjust them to match my needs, (mongo driver etc...) see the dockerfiles I created.

  How to use :

    ------ normal search :
    0)navigate to localhost :
    1)choose a city ( for now 'berlin','hamburg' or 'koln,franfurt'), this is the only required field
    2)set the price range if you want ( I didnt make the check to ensure that the min price should be less than the max price)
    3) click Lunch the Seach
    4) data will be fetched and ranking will be calculated
    5) note that the mlz(MindestensLaufzeit) is set randomly each time and not saved in the database.
    4) I used the DATATABLES PLUGIN TO SORT, SHOW and sort data using price and rating

     ------ show all Studios :
     0) navigate to localhost
     1) choose Show All Studios
     2) All studios available in the database will be fetched

     --- Radius search
      0) navigate to localhost
      you should set the Longitude and latitude by yourself (as my data are not correct )
      1) choose Radius Search
      2) choose longtitude and latitude and Radius and click Search for
      PS : (mongodb searchGeo will be lunched )
      PS : data are not correct , long and latitude are generated randomly, but the search is executed correctly

  Why did I choosed laravel ?
    - Well , THe queue system offered by laravel is amazing to build such applications, I didnt use it here beause I dont have to deal with million of data.



