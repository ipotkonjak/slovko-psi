pocetak = "DELETE FROM `reci`;\nALTER TABLE `reci` AUTO_INCREMENT = 0;\nINSERT INTO `reci` (`rec`) VALUES\n"
lista = set()
srpcir = 'љњертзуиопшђжасдфгхјклчћџцвбнм'
with open('ulazVeciFilter.txt', encoding='utf8') as f:
    linije = f.readlines()
    for rec in linije:
        rec = rec.strip()[2:-3]
        for ch in rec:
            if not (ch in srpcir):
                print("necirilicno slovo: " + ch + " u " + rec)

        if len(rec) == 5:
            lista.add(rec)
        else:
            print("rec nije od 5 slova " + rec)

l = list(lista)
l.sort()
ispis = open('izlazVeciFilter.txt', 'w', encoding='utf8')
ispis.write(pocetak)
for i in range(0, len(l) - 1):
    ispis.write('(\'' + l[i] + '\'),\n')

ispis.write('(\'' + l[len(l) - 1] + '\');\n')
ispis.close()
