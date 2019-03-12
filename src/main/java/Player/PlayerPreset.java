package Player;

import java.util.ArrayList;
import java.util.List;

public class PlayerPreset {
    private String name;

    PlayerPreset(String name) {
        this.name = name;
    }

    public String getName() {
        return name;
    }

    public List<Integer> getSkills() {
        return new ArrayList<Integer>();
    }
}
