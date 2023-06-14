import {useContext} from "react";
import SafeBetContext from "../context/SafeBetProvider";

const useSafeBet = () => {
  return useContext(SafeBetContext);
};

export default useSafeBet
