import React, { useEffect, useState } from "react";
import { Slide } from 'react-slideshow-image';
import axiosConfig from '../Public Components/axiosConfig';
import { Link } from "react-router-dom";
import 'react-slideshow-image/dist/styles.css'
import '../CSS/slides.css';

const Home=()=>{

    const[movies,setMovies] = useState([]);
    const[images,setImages] = useState('');
    useEffect(()=>{
        axiosConfig.get("movie/list").then((rsp)=>{      
        setMovies(rsp.data);
        },(er)=>{

        })
    },[]);


    return(
        <Slide>

                {
                    movies.map((movie)=>
                    <div className="each-slide-effect" key={movie.id}>
                        <img src={`http://localhost:8000/banners/${movie.banner}`} width='50%' height='1000px' alt={movie.name} />                       
                    </div>
                    
                    )
                }
        </Slide>
    )
}

export default Home;