<article>
    <h3 id="emdia">emDia - beszélő detektáló</h3>

    <h4>Az eszközről</h4>

    <h5>Mire jó? Mit csinál?</h5>
    <p>A modul beszélődetekciót végez; tehát a 'ki, mikor beszélt?' kérdésre ad választ egy több beszélő beszédét tartalmazó hangfelvétellel kapcsolatban.</p>

    <h5>Mi a bemenet?</h5>
    <p>Egy audio fájl (pl .wav, .mp3 formátumban).</p>

    <h5>Mi a kimenet?</h5>
    <p>Egy, a területen használt szabványnak megfelelő (RTTM) szövegfájl, ahonnan soronként leolvasható, hogy a felvétel egyes szakaszain melyik beszélő beszél. (Az algoritmus csak a beszélőváltásokat állapítja meg, a beszélők személyazonosságát nem.)</p>

    <h5>Egy példa a működésre.</h5>
    <p>Példa egy kimeneti fájl egy részletére: (beszélőváltás a felvétel 47. másodpercénél, egy új beszélő szólal meg)</p>
    <p>SPEAKER SpeechNonSpeech 1 46.670 0.300 &lt;NA&gt; &lt;NA&gt; SPK01 &lt;NA&gt;
        <br>SPKR-INFO SpeechNonSpeech 1 &lt;NA&gt; &lt;NA&gt; &lt;NA&gt; unknown SPK16 &lt;NA&gt;
        <br>SPEAKER SpeechNonSpeech 1 46.970 2.220 &lt;NA&gt; &lt;NA&gt; SPK16 &lt;NA&gt;
    </p>
    <h4>Fejlesztőknek</h4>

    <h5>Hol található? (bináris/forrás)</h5>
    <p>A forrás elérhető a <a href="https://github.com/juditacs/hunspeech/blob/master/speaker_diarization/em-dia.py" target="_blank">https://github.com/juditacs/hunspeech/blob/master/speaker_diarization/em-dia.py</a> linken.</p>

    <h5>Milyen nyelven írt?</h5>
    <p>Python.</p>

    <h5>Input/output adatformátum?</h5>
    <p>Bemeneti: .wav, .mp3, vagy bármilyen egyéb, a SoX (Sound Exchange) eszköz által támogatott audio formátum.
        <br>Kimeneti: Két, a SHOUT eszköz kiemeneteként előállított, RTTM (Rich Transcription Time Marked) kompatibilis fájl, ezek a megtalált beszéd-zaj-csend, illetve a különböző beszélőkhöz tartalmazó audio szegmenseket írják le.</p>

    <h5>Hogyan futtatható?</h5>
    <p>python em-dia.py [-h] [-m SHOUT_MODEL] [-s SAD_FN]
        <br>input_fn output_dir shout_dir</p>
    <p>Az egyes argumentumok jelentései leolvashatóak a python em-dia.py --help parancs kiadásával.</p>

    <h5>Milyen liszensz vonatkozik rá? (Ha nem a teljesen nyílt CC BY)</h5>
    <p>GPL</p>

    <h5>További információk</h5>
    <p></p>
</article>