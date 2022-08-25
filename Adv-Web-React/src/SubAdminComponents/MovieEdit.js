import {useParams} from 'react-router-dom';
import {useState,useEffect}  from 'react';
import axiosConfig from '../Public Components/axiosConfig';

const MovieEdit=()=>{

    const {id} = useParams();  
    const [name,setName] = useState("");
    const [description,setDescription] = useState("");
    const [genre,setGenre] = useState("");
    const [banner,setBanner] = useState(null);
    const [movie,setMovie] = useState(null);    

    const [errs,setErrs] = useState({});
    const [msg,setMsg] = useState("");
    
    const [Data,setMovieDetails] = useState(null);

    useEffect(()=>{

        axiosConfig.get("http://localhost:8000/api/movie/details/"+id).then((rsp)=>{
            setName(rsp.data.name);
            setDescription(rsp.data.description);
            setGenre(rsp.data.genre);
            debugger

        },(er)=>{
            
        })

    },[])

    
    const handleSubmit=(event)=>{
        event.preventDefault();
        var data = new FormData();

        console.log(movie);
        if(movie!=null)
        {
            data.append("movie",movie,banner.name);
        }
        if(banner!=null)
        {
            data.append("banner",banner,banner.name);
        }
            
        data.append("name",name);
        data.append("description",description);
        data.append("genre",genre);
        
        axiosConfig.post("movie/update/"+id,data).
        then((succ)=>{
            //setMsg(succ.data.msg);
            debugger;            
            window.location.href="/moviemanage";
        },(err)=>{
            setErrs(err.response.data);
            debugger
        })
    }



    
    return(
        <div>
            Movie Id : {id} <br/>
            

            <form onSubmit={handleSubmit}>
            <h1>{msg}</h1>
            Movie Name<input value={name} onChange={(e)=>{setName(e.target.value)}} type="text"/><span>{errs.name? errs.name[0]:''}</span><br/>
            Description: <input value={description} onChange={(e)=>{setDescription(e.target.value)}} type="text"/><span>{errs.description? errs.description[0]:''}</span><br/>
            Genre : <span>{errs.genre? errs.genre[0]:''}</span><br/>
                        <input type="radio" name="genre" value='Action' onClick={(e)=>{setGenre(e.target.value)}} checked={genre === "Action"}/>Action<br/>
                        <input type="radio" name="genre" value='Thriller'onClick={(e)=>{setGenre(e.target.value)}} checked={genre === "Thriller"}/>Thriller<br/>
                        <input type="radio" name="genre" value='Comedy'onClick={(e)=>{setGenre(e.target.value)}} checked={genre == "Comedy"}/>Comedy<br/>
                        <input type="radio" name="genre" value='Adventure'onClick={(e)=>{setGenre(e.target.value)} } checked={genre == "Adventure"}/>Adventure<br/>
                        <input type="radio" name="genre" value='Documentary'onClick={(e)=>{setGenre(e.target.value)}} checked={genre == "Documentary"}/>Documentary<br/>
                        

            Movie File: <input type="file" onChange={(e)=>{setMovie(e.target.files[0])}} name="movie"></input> <span>{errs.movie? errs.movie[0]:'(Optional)'}</span> <br/>
            Banner: <input type="file" onChange={(e)=>{setBanner(e.target.files[0])}} name="banner"></input> <span>{errs.banner? errs.banner[0]:'(Optional)'}</span> <br/>
            <input type="submit" value="Upload"/> 
        </form>

        </div>
    )

}
export default MovieEdit;