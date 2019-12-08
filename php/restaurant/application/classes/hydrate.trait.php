<?php
trait Hydrate{
	public function hydrate($data)
    	{
            
    		foreach($data as $propriete => $valeur)
    		{
    			$methodName = 'set'.ucfirst($propriete);
    			if (method_exists($this, $methodName))
    				$this->$methodName($valeur);
    		}
        
    	}
}