public abstract class CommonFeatures //Abstract class which must be inherited
{
	//Protected instance variables
	protected String Name ;
	protected String Id ;
	protected String Department ;
	protected String Cgpa ;
	
	//Abstract setter methods
	abstract void setName(String Name) ;
	abstract void setId(String Id) ;
	abstract void setDepartment(String Department) ;
	abstract void setCgpa(String Cgpa) ;
	
	//Abstract getter methods
	abstract String getName() ;
	abstract String getId() ;
	abstract String getDepartment() ;
	abstract String getCgpa() ;
}