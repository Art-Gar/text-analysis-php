<?php

namespace App\Helpers;

enum RBAC: int
{
    case Admin =                0x40000000;
    case None =                 0x00000001;
    case EditPagrForms =        0x00000002;
    case EditKaitymas =         0x00000004;
    case EditGimine =           0x00000008;
    case EditSkaicius =         0x00000010;
    case EditLinksnis =         0x00000020;
    case EditKamienas =         0x00000040;
    case EditLaipsnis =         0x00000080;
    case EditApibreztumas =     0x00000100;
    case EditValdymas =         0x00000200;
    case EditVeiksmForma =      0x00000400;
    case EditRusis =            0x00000800;
    case EditNuosaka =          0x00001000;
    case EditLaikas =           0x00002000;
    case EditSudVeiksmFormos =  0x00004000;
    case EditAsmuo =            0x00008000;
    case EditRefleksyvumas =    0x00010000;
    case EditSavarankiskumas =  0x00020000;
    case EditKontekstas =       0x00040000;
    case EditLeksika =          0x00080000; 
    // case Edit =                 0x00400000;
    // case Edit =                 0x00800000;
    // case Edit =                 0x01000000;
    // case Edit =                 0x02000000;
    // case Edit =                 0x04000000;
    // case Edit =                 0x08000000;
    // case Edit =                 0x10000000;
    // case Edit =                 0x20000000;
    // case Edit =                 0x40000000;
    case EditUsers =            0x80000000;
}
