++++ÜBUNGSANGABE++++

Planen und implementieren Sie eines Service das PhP Schleifen simuliert. Jede der dreiSchleifen Varianten soll jeweils in einem Objekt gekapselt sein. 
Das Service kann über einen Parameter gesteuert werden und drei verschiedene Simulationen ausführen. DasErgebnis wird als JSON zurück geliefert.
Als Input dient, ein Array der aus den Buchstaben $characters = [A..Z] besteht.

**Die For-Schleife soll alle geraden Buchstaben in ein Array ablegen.
**Die Foreach Schleifen Simulation soll einen rückwärts sortierten Array per ForSchleife erzeugen; also [Z..A].
**Die While Schleife soll alle Zeichen in ein Array Schreiben bis das gewünschteZeichen gefunden wurde.

+++Schnittstelle+++
**GET Parameter String: loopType (mögliche Werte: REVERSE, EVEN, UNTIL)
**GET Parameter String: until (bis zu welchem Zeichen) 

++++Output:++++
{
"loopName": "String",
"result": "Array"
}

Achten Sie darauf, wie die Objekte konzipiert werden, wie sie zusammenarbeiten undwelche Eigenschaften von außen nicht manipuliert werden sollten.
Überlegen Sie sich wo und wie die Daten zwischen Objekten weiter gegeben werden.
Überprüfen Sie Ihre JSON Ausgabe mit https://jsonlint.com/.
