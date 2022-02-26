import java.util.*;

class reverseStr {
	public static void main(String[] args) {
		reverseStr reverse = new reverseStr();
        Scanner scanner = new Scanner(System.in);
        System.out.print("Enter the flag: ");
        String userInput = scanner.next();
		String input = userInput.substring("MOCSCTF{".length(),userInput.length()-1);
		if (reverse.checkFlag(input)) {
		    System.out.print("Correct!");
		} else {
		    System.out.print("Wrong!");
	    }
	 }
	

	public boolean checkFlag(String str) {
		if (str.length() != 22) {
            return false;
        }
		StringBuilder stringBuilder = new StringBuilder();
		String[] strArray = str.split("_");

		for(int i=0; i<3; i++){ 
			char[] s1 = strArray[i].toCharArray(); 
			for (int j = s1.length-1; j>=0; j--)
			{
				stringBuilder.append(s1[j]);
			}
			stringBuilder.append("_");
		}

		String finalString = stringBuilder.toString();
       	return finalString.equals("Esr3v3R_eSReVer_9n1rt3_");
	}

}

