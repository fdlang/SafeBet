import useSafeBet from "../hooks/useSafeBet";
import { mapPlayerImage } from "../utils/imageMapperMen";
import {removeTagAndContent} from '../utils/helpers'

export default function Partido({ partido }) {
   
    const {handleClickModal, handleClickDatosPartido} = useSafeBet();
    const { 
            ["home_name"]: jugador1, 
            ["away_name"]: jugador2, 
            homeResult,
            awayResult,
            country_name,       
            partialresult,

        } = partido;
    
    const imagen1 = mapPlayerImage(jugador1);
    const imagen2 = mapPlayerImage(jugador2);
    const formatPartialresult = removeTagAndContent(partialresult);

    return (
        <div
            className="border p-3 shadow bg-white hover:bg-amber-400"
            type="button"
            onClick={() => {
                handleClickModal();
                handleClickDatosPartido(partido);
            }}
        >
            <div className="flex items-center">
                <div className="flex flex-col items-center">
                    <img className="w-20 mb-2" src={imagen1} alt="Imagen de jugador 1" />
                    <h3 className="text-lg font-bold text-center" style={{ width: "100px", overflow: "hidden", textOverflow: "ellipsis", whiteSpace: "nowrap" }}>
                        {jugador1}
                    </h3>
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
                    <img className="w-20 mb-2" src={imagen2} alt="Imagen de jugador 2" />
                    
                    <h3 className="text-lg font-bold text-center" style={{ width: "100px", overflow: "hidden", textOverflow: "ellipsis", whiteSpace: "nowrap" }}>
                        {jugador2}
                    </h3>
                </div>
            </div>
        </div>
    );
}
