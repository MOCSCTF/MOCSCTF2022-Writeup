import java.util.Scanner;
import org.apache.logging.log4j.LogManager;
import org.apache.logging.log4j.Logger;

public class MyLogger {
    public static void main(String[] args) {
        
        try {
            Logger logger = LogManager.getLogger(MyLogger.class);
            Scanner sc= new Scanner(System.in);
            System.out.print("What are you looking for? ");  
            String str= sc.nextLine();
            if (str.toLowerCase().contains("jdni")) {
                System.out.println("Bad input!");
                System.exit(0);
            } 
            if (str.toLowerCase().contains("flag")) {
                System.out.println("Look up SECRET_VALUE!");
            } else {
                logger.error("Not Found: {}", str);
            } 
        } catch (Exception exception) {
            System.err.println(exception);
        } 
    }
}
