export function bandera(country) {
  const banderas = {
    France: "triangleFrancia",
    Switzerland: "triangleSwitzerland",
    Morocco: "triangleMarruecos",
    Austria: "triangleAustria",
    Brazil: "triangleBrasil",
    Italy: "triangleItalia",
    Bulgaria: "triangleBulgaria",
    macedonia: "triangleMacedonia",
    Japan: "triangleJapon",
    Mexico: "triangleMexico",
    Ethiopia: "triangleEthiopia",
    Serbia: "triangleSerbia",
    Romania: "triangleRomania",
    Spain: "triangleEspania",
    Slovenia: "triangleEslovenia",
    Usa: "triangleUsa",
    Turkey: "triangleTurkia",
    "South korea": "triangleKorea",
    Tunisia: "triangleTunisia",
    "Czech republic": "triangleCheca",
    "Bosnia and herzegovina": "triangleBosnia",
    Germany: "triangleAlemania",
    Portugal: "trianglePortugal",
    Thailand: "triangleTailandia",
    Indonesia: "triangleIndonesia",
  };

  return banderas[country] || ""; // Devuelve el estilo de la bandera o una cadena vacía si no se encuentra el país
}
