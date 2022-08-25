import React,{useState,useEffect} from "react";
import axios from 'axios';
import axiosConfig from '../Public Components/axiosConfig';
import MovieList from "./MovieList";
import TopBar from "./TopBar";


const MovieMange=()=>{


    return(
        <div>
            <MovieList/>
        </div>
    )
}

export default MovieMange;