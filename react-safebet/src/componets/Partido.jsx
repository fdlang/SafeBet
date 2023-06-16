import useSafeBet from "../hooks/useSafeBet";
import { mapPlayerImage } from "../utils/imageMapperMen";
import {removeTagAndContent, separarNombres} from '../utils/helpers'

export default function Partido({ partido }) {
   
    const {handleClickModal, handleClickDatosPartido} = useSafeBet();
    const { 
            home_name, 
            away_name, 
            homeResult,
            awayResult,
            country_name,       
            partialresult,
            is_double,

        } = partido;
    
    const imagen1 = mapPlayerImage(home_name);
    const imagen2 = mapPlayerImage(away_name);
    const formatPartialresult = removeTagAndContent(partialresult);

    const equipoHome = separarNombres(home_name)
	const equipoAway = separarNombres(away_name)

	const jugador1 = mapPlayerImage(equipoHome[0]);
	const jugador2 = mapPlayerImage(equipoHome[1]);
	const jugador3 = mapPlayerImage(equipoAway[0]);
	const jugador4 = mapPlayerImage(equipoAway[1]);


    return (
        <div
            className="border p-3 shadow bg-white hover:bg-amber-400"
            type="button"
            onClick={() => {
                handleClickModal();
                handleClickDatosPartido(partido);
            }}
        >
            <div className="flex items-center" >
                <div className="flex flex-col items-center">
                    {
                        is_double === 0 ? (
                            <div>
                                <img 
                                    className="w-20 mb-2" 
                                    src={imagen1} 
                                    alt="Imagen de jugador 1" 
                                    />
                                <h3 className="text-lg font-bold text-center" 
                                    style={{ width: "100px", overflow: "hidden", textOverflow: "ellipsis", whiteSpace: "nowrap" }}
                                    >
                                    {home_name}
                                </h3>
                            </div>
                        ) : (
                            <div>
                                <img 
                                    className="w-20 mb-2" 
                                    src={jugador1} 
                                    alt="Imagen de jugador 1" 
                                    />
                                <h3 
                                    className="text-lg font-bold text-center" 
                                    style={{ width: "100px", overflow: "hidden", textOverflow: "ellipsis", whiteSpace: "nowrap" }}
                                    >
                                    {equipoHome[0]}
                                </h3>

                                <img 
                                    className="w-20 mb-2" 
                                    src={jugador2} 
                                    alt="Imagen de jugador 2" 
                                    />
                                <h3 
                                    className="text-lg font-bold text-center" 
                                    style={{ width: "100px", overflow: "hidden", textOverflow: "ellipsis", whiteSpace: "nowrap" }}
                                    >
                                    {equipoHome[1]}
                                </h3>
                            </div>
                        )
                    }  
                </div>

                <div className="p-5 flex-grow text-center">
                    <p className="text-sm">
                        <br /> <strong>País</strong>
                        <br />
                        {country_name}
                    </p>

                    <p className="text-sm">
                        <br /> <strong>Resultado SET</strong>
                        <br />
                        {formatPartialresult ? formatPartialresult : "Por definir"}
                    </p>

                    <p className="text-sm">
                        <br /> <strong>Resultado final</strong>
                        <br />
                        {homeResult ? homeResult + " - " + awayResult : "Por definir"}
                        {}
                    </p>
                </div>

                <div className="flex flex-col items-center">
                    {
                        is_double === 0 ? (
                            <div>
                                <img 
                                    className="w-20 mb-2" 
                                    src={imagen2} 
                                    alt="Imagen de jugador 2" 
                                    />
                                <h3 
                                    className="text-lg font-bold text-center" 
                                    style={{ width: "100px", overflow: "hidden", textOverflow: "ellipsis", whiteSpace: "nowrap" }}
                                    >
                                    {away_name}
                                </h3>
                            </div>
                        ) : (
                            <div>
                            <img 
                                className="w-20 mb-2" 
                                src={jugador3} 
                                alt="Imagen de jugador 3" 
                                />
                            <h3 
                                className="text-lg font-bold text-center" 
                                style={{ width: "100px", overflow: "hidden", textOverflow: "ellipsis", whiteSpace: "nowrap" }}
                                >
                                {equipoAway[0]}
                            </h3>

                            <img 
                                className="w-20 mb-2" 
                                src={jugador4} 
                                alt="Imagen de jugador 4" 
                                />
                            <h3 
                                className="text-lg font-bold text-center" 
                                style={{ width: "100px", overflow: "hidden", textOverflow: "ellipsis", whiteSpace: "nowrap" }}
                                >
                                {equipoAway[1]}
                            </h3>
                        </div>
                        )
                    }
                </div>
            </div>
        </div>
    );
}
