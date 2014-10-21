Notes on BoatClub C# Workshop 2
Code:
UserView:
Very few comments, might not be needed, but a comment to explain what every function does is always good form since you do not need to read the whole function to understand what it does. Especially when Visual Studio supports intellisense with good support for the different comments that you might want to put there.
Constructor must not be defined if it's empty.
MainMenuView:
Odd use of a do while since the condition is true, so it will always loop anyway. Changed the code and didn't remove this part?
BoatView:

View:
There seems to be a function called ContinueOnKeyPressed in every view. Why isn't this handled by inheritance? Since they are all View's then maybe they should inherit this part from a parent class?

User:
Constructor does not need to be defined if it is totally empty.
ShowUsersSimple and ShowUsersFull seems to be exactly the same. And isn't this a View problem? You could just return a list of all the users and let the view handle what info it needs. As such it shouldn't need two functions on User, just a single GetAllUsers or something similar.
GetUser seems to be doing more or less exactly the same as ShowUsersSimple and ShowUsersFull except limiting the query to a single user based on it's memberId. Why not use these functions and select from those instead? Something like `User user = users.Single(x=>x.MemberId == memberId);` does exactly the same thing and you do not need to do the querying two times for such a simple thing.
Boat:
There seems to be about the same typ of functions here aswell, but maybe they are a bit more tricky to change. GetAllUserBoats seems an awful lot like GetBoatInfo, but it selects a lot of boats instead of a single one based on a different query.
Maybe there should be a way to query the boats and get a list of them in a function that you then use to select on later on? You could have a function GetAllBoats that selects all boats, and then in the function GetBoatInfo you limit that query to the single boat that you want and in GetAllUserBoats you limit the query to the memberid that you want. This would be bad if we have millions of boats or users, but then we would probably use a database instead. Does this seem fair?

Diagram:
ClassDiagram:
The ClassDiagram that Visual Studio generates is a good Class Diagram if you want to use the code for building your own application, based on the classes that are present. But it doesn't help you that much if you want to understand how the code interacts with the differnet classes. It doesn't list any dependencies in a good way. It lists what parameters the functions expect, and what fields they've got, but without the UML class diagram arrows and such it makes it so much more difficult to see whats going on.
It would also make sense to have the Models have a parent Model that they inherit from and the Views inherit from a parent View so that we can see that they are of the same type. The views share a function between them since they all interact with the console, the ContinueOnKeyPressed function. If there were a parent View class this could be inherited with the protected keyword and it wouldn't need to exist in every class, just in View.
There seems to be no relations what so ever in the classDiagram, so this has to be redone with a better tool for the purpose. Atleast not in the UML kind of way.
Is the requirement of a unique member id correctly done?
Depends on what you interpret the requirement as. If you want to be certain that it is a unique memberid then you must do something like an incremental id that won't loop. The implementation does not satisfy that because around 270k users will result in a collision, something that the code does not handle. But with that many users you would probably use a database instead and the problem wouldn't be there. So yeah, it is mostly correctly done, assuming less than 100k users, there shouldn't be that much of a problem.
What is the quality of the implementation code?
Code standards, good. C# allows for a wide range of different ways to implement stuff, but this code is good in all the ways. It uses LINQ, it doesn't do things in some outdated way.
Naming is great and conforms to the capitalization styles that exist with Pascal case and camelCase where there should be a difference.
Duplication. There is a few places where duplication has occurred. The Views share a function between them that should be easy to move to a parent class, and the Boat and User models has a few functions that share code between them. These shouldn't be that difficult to refactor and I have provided some solutions that I believe should combat these duplicate code cases.
Dead Code. There seems to be no real dead code. There are a few commented out lines of code, but not that much that is something to bother with. Sometimes that commented out code is good to have so that you understand what the developer had in mind at first and why they changed their mind. As long as it isn't excessive there isn't a real problem, and there isn't a real problem in this code base.
AS a developer would the diagrams help you and why/why not?
As I have discussed earlier the class diagram is missing a lot of stuff to be something that is really useful. The diagrams that Visual studio generates are great if you use inheritance and do not need to bother with dependencies and such, but in this case those would be useful. 
The Sequence diagrams does not go the whole distance and tell you what they actually result in. They show you a way into the code, display what happens in one direction, but nothing gets returned. Nothing is written to the console and nothing is returned from the user. It might be difficult to present should things in a sequence diagram and not make it extremely cluttered, but they are missing some stuff.
The strong points of the design.
The use of the C# language is great. It is easy to read and follow along. It is almost self documenting.
The weakpoints.
There are no comments on the functions. Comments does not really need to be in the functions, but documenting what a function does and what the expected parameters should be is really important so that you do not need to start reading the code to understand what is going on.
There seems to be no real controller, per se. The MainMenuView does all of the handling of routing and then hands of the controlls to different views. The View is changing the Models and is not conforming to the read only relation that should be between the view and the model. There should be a Controller that handles these kinds of stuff since the Views are only there to present things to the user. The user should interact with the controller nad the controller should be the one changing the model so that you could easily swap out the view without breaking the functionality of the code.

This code does not fulfill the criteria for grade 3 since it doesn't separate the Model and the View in the way that it should. Changing the Views so that they only do display stuff is what needs to be done to allow this to pass grade 3. And also provide a better class diagram that displays the actual interaction of the classes. There are associations and dependencies in the classes that aren't modelled in the diagram and this must be fixed.