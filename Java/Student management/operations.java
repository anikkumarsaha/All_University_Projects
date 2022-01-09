import java.util.* ; //For taking input and exception handling
import java.lang.* ;

public class operations extends AllRecord //Inheriting AllRecord class
{
	int input = 0 ;
	
	Scanner scn = new Scanner(System.in) ; //Scanner for taking input
	
	public void task()
	{
		do
		{
			System.out.println() ;
			System.out.println() ;
			System.out.println("What operation you prefer to do?") ;
			System.out.println("1) Add student") ;
			System.out.println("2) Remove student") ;
			System.out.println("3) View students") ;
			System.out.println("4) End") ;
			System.out.println("Please enter the number only") ;
			
			try //try block for finding exception
			{
				Scanner scan = new Scanner(System.in) ; //Scanner for taking input
				
				int input = scn.nextInt() ; //Taking input
				
				if(input == 1)
				{
					System.out.println() ;
					System.out.println("You can add a maximum of 50 students") ;
					System.out.println() ;
					System.out.print("Name : ") ;
					String name = scan.nextLine() ; //Taking input
					
					System.out.print("ID : ") ;
					String id = scan.next() ; //Taking input
					checkId(id) ; //Checking if the user has given the same id more than once. If yes, it won't take the id
					
					System.out.print("Department : ") ;
					String department = scan.next() ; //Taking input
					
					System.out.print("Cgpa : ") ;
					String cgpa = scan.next() ; //Taking input
					
					//Passing all the inputs as parameters in parameterized constructor of student class
					student st = new student(name , id , department , cgpa) ;
					insertDetails(st) ;	 //Passing object in insertDetails method from AllRecord class
				}
				else if(input == 2)
				{
					System.out.println() ;
					System.out.print("Type the Id of the student that you want to remove : ") ; //Remove by ID
					String id = scan.next() ; //Taking input
					removeDetails(id) ; //Passing String in removeDetails method AllRecord class
				}
				else if(input == 3)
				{
					showDetails() ; //Calling method to show all students from AllRecord class
				}
				else if(input == 4)
				{
					System.out.println("Thank you") ;
					break ; //Break if user wants to end
				}
				else if(input>4 || input <1) //If user give input beyond those 4 options
				{
					System.out.println("This option doesn't exist! Please try over") ;
					System.exit(0) ; //Terminates program fully
				}
			}
			catch(InputMismatchException e) //Catch block handling the exception
			{
				System.out.println("Invalid Input! Please try over " + e) ;
				System.exit(0) ; //terminates the program fully
			}
		}
		while(input != 4) ; //Loop will run until user enters 4 to end the operations
	}
}