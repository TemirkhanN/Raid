package Player;

import java.util.ArrayList;
import java.util.List;

public class PlayerPreset {
    private String name;
    private Integer attack;

    public PlayerPreset(String name, Integer attack) {
        this.name = name;
        this.attack = attack;
    }

    public String getName() {
        return name;
    }

    public List<Integer> getSkills() {
        return new ArrayList<Integer>();
    }

    public Integer getAttack() {
        return attack;
    }
}
