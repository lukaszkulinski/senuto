
# Obrona przed botami

1) Honeypots - wrzucenie do formularza pól niewidocznych dla użytkownika. Boty z automatu wypełnią te pola więc będzie można je wykryć.

2) Boty często używają proxy/vpn więc można skorzystać z API takich jak https://www.ipqualityscore.com/documentation/proxy-detection-api/overview i pobrać informacje na temat IP, z którego wysyłane sa requesty i odfiltrowywać boty.

3) Oprócz powyższego na pewno są jakieś blacklisty z IP, z których można defaultowo odfiltrowywać requesty. Dodatkowo zawsze można samemu tworzyć sobie takie listy.

4) Jeśli aplikacja skierowana jest na użytkowników jakiegoś kraju, np. jest tylko na Polskę, można próbować bronić się przed botami, poprzez geolokację po IP i odrzucać requesty z IP z innych krajów.

5) Dodanie pola z pytaniem, na które odpowiedź będzie znał tylko człowiek.

6) Dwustopniowa weryfikacja - można wysyłać do użytkownika email/sms z kodem, do potwierdzenia wysłania formularza.

7) Użycie gotowych rozwiązań np. https://akismet.com/ lub https://www.cloudflare.com/lp/ppc/bot-management/

8) Można spróbować wykrywać czy formularz został wysłany z iframe, boty czasami ładują formularze w iframeach, żeby skrócić czas ładowania.


#### Komentarz
Jakbym miał wybrać jeden czy dwa najlepsze sposoby do ochrony przed botami, to uważam, że będą to  gotowye rozwiązania jakie oferują akismet lub ipqualityscore. Wydaje się, że mają dużą skuteczność w wykrywaniu i nie wymagają dodatkowych działań prawdzwiego użytkownika, co też jest plusem.

Natomiast generalnie, tak jak chyba w każdej dziedzinie, jeśli ataków jest naprawdę wiele i jeden sposób nie działa, wtedy powinno się użyć kilku rozwiązań na raz np. Użyć honeypots, blokować po geolokacji i przepuszczać przez akismet.

Uważam też, że w zależności od tego co to jest za formularz, powinno się unikać rozwiązań typu odpowiedzi an dodatkowe pytania, które mogą wpłynąć na doświadczenia prawdziwego usera. Jeśli chcemy zbierać jakieś informacje, ale do formularza wrzucamy jakieś dodatkowe zbędne z perspektywy usera pola, to będzie to odpychać od wypełniania formularza.