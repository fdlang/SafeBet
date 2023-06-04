import useSafeBet from '../hooks/useSafeBet'
import { mapPlayerImage } from "../utils/imageMapperMen";
import {removeTagAndContent, formatNameTorneo, porcentajeAcierto, separarNombres} from '../utils/helpers'


export default function ModalPartido() {

	const {datosPartido, handleClickModal, handleAgregarFavorito, datos} = useSafeBet();

	const imagen1 = mapPlayerImage(datosPartido.home_name);
	const imagen2 = mapPlayerImage(datosPartido.away_name);
	const formatPartialresult = removeTagAndContent(datosPartido.partialresult);
	const titulo = formatNameTorneo(datos.name);
	const odds_local = porcentajeAcierto(datosPartido.odds_local);
	const odds_visitor = porcentajeAcierto(datosPartido.odds_visitor);
	
	// Determinar el nombre del ganador del partido
	let ganador = null;
	if (datosPartido.away_winner === 'win') {
		ganador = datosPartido.away_name;
	} else if (datosPartido.home_winner === 'win') {
		ganador = datosPartido.home_name;
	}

	const equipoHome = separarNombres(datosPartido.home_name)
	const equipoAway = separarNombres(datosPartido.away_name)

	const jugador1 = mapPlayerImage(equipoHome[0]);
	const jugador2 = mapPlayerImage(equipoHome[1]);
	const jugador3 = mapPlayerImage(equipoAway[0]);
	const jugador4 = mapPlayerImage(equipoAway[1]);

	return (
		<div className='md:flex gap-10'>
			<div className='md:w-1/3'>
				{
					datosPartido.is_double === 0 ? (
						<div>
							<img
								className='pt-5'
								alt={`jugador 1 ${imagen1}`}
								src={imagen1}
							/>
							<p className='mt-5 flex justify-center'>
								{datosPartido.home_name}
							</p>
						</div>
					) : (
						<div>
							<img
								className='pt-5'
								alt={`Imagen equipo 1, jugador 1 ${jugador1}`}
								src={jugador1}
							/>
							<p className='mt-5 flex justify-center'>
								{equipoHome[0]}
							</p>

							<img
								className='pt-5'
								alt={`Imagen equipo 1, jugador 2 ${jugador2}`}
								src={jugador2}
							/>
							<p className='mt-5 flex justify-center'>
								{equipoHome[1]}
							</p>
						</div>
					)
				}
			</div>

			<div className='md:w-2/3'>
				<h1 className='text-3xl font-bold mt-5 text-center'>
					{titulo}
				</h1>

				<p className="text-sm text-center">
						<br /> <strong>País</strong>
						<br/>
						{datosPartido.country_name}
				</p>

				<p className="text-sm text-center">
					<br /> <strong>Resultado SET</strong>
					<br/>
					{formatPartialresult ? formatPartialresult : "Por definir"}
				</p>

				<p className="text-sm text-center">
					<br /> <strong>Resultado final</strong>
					<br />
					{datosPartido.homeResult ? datosPartido.homeResult + " - " + datosPartido.awayResult : "Por definir"}
				</p>

				<p className="text-sm text-center">
					<br /> <strong>Cuotas</strong>
					<br />
					{datosPartido.odds_local + " - " + datosPartido.odds_visitor}
				</p>

				<p className="text-m text-center">
					<br /> <strong>Probabilidad de ganar el partido</strong>
					<br />
					{odds_local + " %" + " - " + odds_visitor + " %"} 
				</p>

				<p className="text-sm text-center">
					<br /> <strong>Ganador del partido</strong>
					<br />
					{ganador !== null ? ganador : "Por disputar"}
				</p>
		   
				<div 
					className='mt-5 flex justify-center' 
					onClick={() => { 
						handleClickModal(); 
						handleAgregarFavorito(datosPartido); }}
					>
					<input
						className='bg-indigo-600 hover:bg-indigo-800 py-2 mt-8 rounded uppercase font-bold text-white text-center w-1/2 cursor-pointer'
						type="submit" 
						value='Agregar favorito'        
					/>
				</div>
			</div>

			<div className='md:w-3/3'>
				<div className='flex justify-end'>
					<button onClick={handleClickModal}>
						<svg 
							xmlns="http://www.w3.org/2000/svg" 
							fill="none" 
							viewBox="0 0 24 24" 
							strokeWidth={1.5} 
							stroke="currentColor"
							className="w-6 h-6"
						>
							 <path strokeLinecap="round" strokeLinejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
						</svg>
					</button>
				</div>

				{
					datosPartido.is_double === 0 ? (
						<div>
							<img
								alt={`Imagen jugador 2 ${imagen2}`}
								src={imagen2}
							/>
							<p className='mt-5 flex justify-center'>
								{datosPartido.away_name}
							</p>
						</div>
					) : (
						<div>
							<img
								className='pt-5'
								alt={`Imagen equipo 2, jugador 3 ${jugador3}`}
								src={jugador3}
							/>
							<p className='mt-5 flex justify-center'>
								{equipoAway[0]}
							</p>

							<img
								className='pt-5'
								alt={`Imagen equipo 1, jugador 2 ${jugador4}`}
								src={jugador4}
							/>
							<p className='mt-5 flex justify-center'>
								{equipoAway[1]}
							</p>
						</div>
					)
				}
			</div>
		</div>
  )
}
