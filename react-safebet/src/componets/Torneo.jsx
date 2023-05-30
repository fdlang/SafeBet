import React from 'react';
import axios from 'axios';
import useSafeBet from "../hooks/useSafeBet";
import { Link } from 'react-router-dom';
import {formatNameTorneo, firstLetterUpperCase, removeParentheses, category, delCategory, sexo} from '../utils/helpers'
import {bandera} from '../utils/banderas'


export default function Torneo({torneo}){
     
    const {handleClickDatos} = useSafeBet();
    const {matches, country, name, id, categoria_id} = torneo;
    
    const formatName = formatNameTorneo(name)
    const formatCountry = firstLetterUpperCase(country)
    const formatMatches = removeParentheses(matches)
   
    const pais = bandera(formatCountry);
    const categoria = category(name);
  
    const enviarID = (id) => {
        axios.get(`http://localhost:8000/api/id/${id}`)
        .then((response) => {
            console.log("Respuesta enviarID: " + response)
        })
        .catch((error) => {
            console.log("ERROR AL ENVIAR URL: " + error);
        });      
    };
   
    return (
        <Link 
          onClick={() => {
            handleClickDatos(torneo);
            enviarID(id);             
          }}
          to='/prueba/inicio'
        >
          <div className={`border p-3 shadow bg-white hover:bg-amber-400 cursor-pointer mt-5`} >
          <div className={`${pais}`} >
            <div className="p-5">
              <div className="text-lg truncate" style={{ position: 'relative', zIndex: 2 }}>    
                <p>
                  <strong>Pais: </strong> {formatCountry} <br/> 
                  <strong>Nombre: </strong> {delCategory(formatName)} <br/>
                  <strong>Categoria: </strong> {categoria} {categoria_id === 3 && sexo(name)} <br />
                  <strong>Partidos: </strong> {formatMatches}                  
                </p>                             
              </div>   
            </div>  
            </div>     
          </div>
        </Link>
      );
}