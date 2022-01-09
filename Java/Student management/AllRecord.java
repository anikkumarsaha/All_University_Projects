import java.lang.* ;
import java.util.* ; //For taking input and exception handling

import InterFace.RecordInterface ;

public class AllRecord implements RecordInterface //Implementing interface class
{
	static student info[] = new student[50] ; //One to many association // AllRecord has student// Array object
	
	public void insertDetails(student a) //Receiving object as parameter
	{
		boolean status = false ; //boolean data type
		for(int i = 0 ; i<info.length ; i ++) //For loop to go through every space
		{
			if(info[i] == null) //If empty then insert
			{
				info[i] = a ; //Inserting
				status = true ; //If inserted, it will be true
				break ; //Break after inserting
			}
		}
		if(status == false) //Means no empty space
		{
			System.out.println("Inventory is full!") ;
		}
	}
	
	public void removeDetails(String id) //Receiving String as parameter
	{
		for(int i = 0 ; i < info.length ; i++) //For loop to go through every space
		{
			if(info[i].getId().equals(id)) //Matching strings //getId method is accessable here because there is one to many relation between AllRecord and Student
			{
				info[i] = null ; //If matches, inserting null in that space
				System.out.println("Removed") ;
				System.out.println() ;
				break ; //Beak after removing
			}
		}
	}
	
	//Method to show all the students with details at once
	public void showDetails()
	{
		System.out.println("--------------------------------------------------");
		for(int i = 0 ; i<info.length ; i++) //For loop to go through every space
		{
			if(info[i] != null) //If not null then show all details
			{
				//get methods are accessable here because there is one to many relation between AllRecord and Student
				System.out.println("Name : " + info[i].getName()) ;
				System.out.println("ID : " + info[i].getId()) ;
				System.out.println("Department : " + info[i].getDepartment()) ;
				System.out.println("CGPA : " + info[i].getCgpa()) ;
				System.out.println("--------------------------------------------------");
			}
		}
	}
	
	public void checkId(String id)
	{
		for(int i = 0 ; i<info.length ; i++) //For loop to go through every space
		{
			if(info[i] != null) //If not empty
			{
				if(info[i].getId().equals(id)) //If ID matches
				{
					System.out.println("ID already exists! Please start over!") ;
					System.exit(0) ; //It terminates the program fully
				}
			}
		}
	}
}