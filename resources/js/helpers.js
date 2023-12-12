export const RBAC = {
    Admin:                0x40000000,
    None:                 0x00000001,
    EditPagrForms:        0x00000002,
    EditKaitymas:         0x00000004,
    EditGimine:           0x00000008,
    EditSkaicius:         0x00000010,
    EditLinksnis:         0x00000020,
    EditKamienas:         0x00000040,
    EditLaipsnis:         0x00000080,
    EditApibreztumas:     0x00000100,
    EditValdymas:         0x00000200,
    EditVeiksmForma:      0x00000400,
    EditRusis:            0x00000800,
    EditNuosaka:          0x00001000,
    EditLaikas:           0x00002000,
    EditSudVeiksmFormos:  0x00004000,
    EditAsmuo:            0x00008000,
    EditRefleksyvumas:    0x00010000,
    EditSavarankiskumas:  0x00020000,
    EditKontekstas:       0x00040000,
    EditLeksika:          0x00080000,
    InsertZodziai:        0x01000000,
    DeleteZodziai:        0x02000000,
    InsertLeksemos:       0x04000000,
    DeleteLeksemos:       0x08000000,
}

export function userType(permissions) {
    return permissions == 2147483647 ? "Administatorius" : permissions > 1 ? "Redaktorius" : "Skaitytojas";
}

function isPowerOfTwo(n){ 
      
    return (n > 0 && ((n & (n - 1)) == 0)) ? true : false; 
} 
      
// Returns position of the 
// only set bit in 'n' 
export function findPosition(n){ 
    if (isPowerOfTwo(n) == false) 
        return -1; 
  
    var i = 1; 
    var pos = 1; 
  
    // Iterate through bits of n  
    // till we find a set bit i&n 
    // will be non-zero only when 
    // 'i' and 'n' have a set bit 
    // at same position 
    while ((i & n) == 0){ 
          
        // Unset current bit and  
        // set the next bit in 'i' 
        i = i << 1; 
  
        // increment position 
        pos += 1; 
    } 
    return pos; 
} 

export function userHasPermissions(permissions, role) {
    console.log(permissions);
    return (permissions & role) !=0;
}