import useSafeBet from "../hooks/useSafeBet";

export default function FavoritoPartido({partido}) {
    
    const {handleEliminarFavoritoPartido} = useSafeBet();
    const { 
        id, 
        ["home_name"]: jugador1, 
        ["away_name"]: jugador2, 
        homeResult,
        awayResult,
        tournament_name,        
        
    } = partido;

  
    return (
        <div className="shadow space-y-1 p-4 bg-white">
        <div className="space-y-2">
          <p className="text-xl font-bold">{tournament_name}</p>
          <p className="text-lg ">{jugador1}  VS  {jugador2}</p>
          <p className="text-lg text-gray-700"> Resultado: {homeResult ? {homeResult} - {awayResult} : "Por definir"} </p>
        </div>
  
        <div className="flex justify-between gap-2 pb-4">
          <button
            type="button"
            className="bg-red-700 p-2 text-white rounded-md font-bold uppercase shadow-md text-center"
            onClick={() => handleEliminarFavoritoPartido(id)}
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              className="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              strokeWidth={2}
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
              />
            </svg>
          </button>
        </div>
      </div>
  )
}
