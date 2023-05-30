import {useContext} from "react";
import SafeBetContext from "../context/safebetProvider";

const useSafeBet = () => {
  return useContext(SafeBetContext);
};

export default useSafeBet
