import {useEffect} from 'react';
import useSafeBet from '../hooks/useSafeBet'
import { mapPlayerImage } from "../utils/imageMapperMen";
import {removeTagAndContent} from '../utils/helpers'

export default function ModalPartido() {

    const {datosPartido, handleClickModal, handleAgregarFavorito, favorito} = useSafeBet();

    const imagen1 = mapPlayerImage(datosPartido.home_name);
    const imagen2 = mapPlayerImage(datosPartido.away_name);
    const formatPartialresult = removeTagAndContent(datosPartido.partialresult);

    useEffect(() => {
        if(favorito.some(favoritoState => favoritoState.id === datosPartido.id)) {
            console.log('si esta en favoritos')
        }
    }, [favorito])
    console.log(datosPartido)

    return (
        <div className='md:flex gap-10'>
            <div className='md:w-1/3'>
                <img
                    className='pt-5'
                    alt={`Imagen jugador1 ${imagen1}`}
                    src={imagen1}
                />
                <p className='mt-5 flex justify-center'>
                    {datosPartido.home_name}
                </p>
            </div>

            <div className='md:w-2/3'>
                <h1 className='text-3xl font-bold mt-5'>
                    {"Nombre del torneo"}
                </h1>

                <p className="text-sm">
                        <br /> <strong>País</strong>
                        <br/>
                        {datosPartido.country_name}
                </p>

                <p className="text-sm">
                    <br /> <strong>Resultado SET</strong>
                    <br/>
                    {formatPartialresult}
                </p>

                <p className="text-sm">
                    <br /> <strong>Resultado final</strong>
                    <br />
                    {datosPartido.homeResult + " - " + datosPartido.awayResult}
                </p>

                <p className="text-sm">
                    <br /> <strong>Cuotas</strong>
                    <br />
                    {datosPartido.odds_local + " - " + datosPartido.odds_visitor}
                </p>
           
                <div className='mt-5'
                    onClick={() => {
                        handleClickModal();
                        handleAgregarFavorito(datosPartido);
                    }}>
                    <input
                    className=" bg-indigo-600 hover:bg-indigo-800 text-white w-full text-lg text-lg font-bold cursor-pointer mt-5"
                        type="submit" 
                        value='Agregar favorito'        
                    />
                </div>
            </div>

            <div className='md:w-3/3'>
                <div className='flex justify-end'>
                    <button onClick={handleClickModal}>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                             <path strokeLinecap="round" strokeLinejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>

                </div>
                <img
                    alt={`Imagen jugador 2 ${imagen2}`}
                    src={imagen2}
                />
                <p className='mt-5 flex justify-center'>
                    {datosPartido.away_name}
                </p>
            </div>
        </div>
  )
}
